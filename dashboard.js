const users = [
  // Trainers
  {
    name: "Abid Khan",
    role: "trainer",
    title: "Full Stack Developer & AI Trainer",
    image: "https://github.com/professionalabidkhan-hue/ABID-KHAN-/blob/main/ABID%20KHAN.png",
    profileUrl: "trainer-abid.html"
  },
  {
    name: "Fatima Ali",
    role: "trainer",
    title: "Cybersecurity Expert",
    image: "images/fatima.jpg",
    profileUrl: "trainer-fatima.html"
  },
  {
    name: "Ahmed Raza",
    role: "trainer",
    title: "Data Science & Analytics",
    image: "images/ahmed.jpg",
    profileUrl: "trainer-ahmed.html"
  },
  // Students
  {
    name: "Student One",
    role: "student",
    title: "O-Level Student",
    image: "images/student-placeholder.jpg",
    profileUrl: "student-one.html"
  },
  {
    name: "Student Two",
    role: "student",
    title: "A-Level Student",
    image: "images/student-placeholder.jpg",
    profileUrl: "student-two.html"
  }
];

const container = document.getElementById("cardContainer");

users.forEach(user => {
  const username = user.name.replace(/\s/g,''); // unique ID
  const card = document.createElement("div");
  card.className = "card";

  card.innerHTML = `
    <div class="role-badge ${user.role}">${user.role.toUpperCase()}</div>
    <img src="${user.image}" alt="${user.name}" id="img-${username}">
    <h3>${user.name}</h3>
    <p>${user.title}</p>
    <button onclick="window.location.href='${user.profileUrl}'">Visit Profile</button>
    <input type="file" accept="image/*" onchange="uploadImage(event, '${username}')">
  `;

  container.appendChild(card);
});

// ====== Upload Image Function ======
function uploadImage(event, username) {
  const file = event.target.files[0];
  if (!file) return;

  const formData = new FormData();
  formData.append('image', file);
  formData.append('username', username);

  fetch('http://localhost:3001/upload', {  // backend URL
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    if (data.imageUrl) {
      document.getElementById(`img-${username}`).src = data.imageUrl;
      alert(`Image for ${username} uploaded successfully!`);
    }
  })
  .catch(err => {
    console.error(err);
    alert('Upload failed!');
  });
}
