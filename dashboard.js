const trainers = [
  {
    name: "Abid Khan",
    title: "Full Stack Developer & AI Trainer",
    image: "https://github.com/professionalabidkhan-hue/ABID-KHAN-/blob/main/ABID%20KHAN.png",
    profileUrl: "trainer-abid.html"
  },
  {
    name: "Fatima Ali",
    title: "Cybersecurity Expert",
    image: "images/fatima.jpg",
    profileUrl: "trainer-fatima.html"
  },
  {
    name: "Ahmed Raza",
    title: "Data Science & Analytics",
    image: "images/ahmed.jpg",
    profileUrl: "trainer-ahmed.html"
  }
  // Add more trainers here
];

const container = document.getElementById("cardContainer");

trainers.forEach(trainer => {
  const username = trainer.name.replace(/\s/g,''); // unique ID for each trainer
  const card = document.createElement("div");
  card.className = "card";

  card.innerHTML = `
    <img src="${trainer.image}" alt="${trainer.name}" id="img-${username}">
    <div class="card-content">
      <h3>${trainer.name}</h3>
      <p>${trainer.title}</p>
      <button onclick="window.location.href='${trainer.profileUrl}'">Visit Profile</button>
      <input type="file" accept="image/*" onchange="uploadImage(event, '${username}')">
    </div>
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

  fetch('http://localhost:3001/upload', {  // your backend URL
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    if (data.imageUrl) {
      // Update card image immediately
      document.getElementById(`img-${username}`).src = data.imageUrl;
      alert(`Image for ${username} uploaded successfully!`);
    }
  })
  .catch(err => {
    console.error(err);
    alert('Upload failed!');
  });
}
