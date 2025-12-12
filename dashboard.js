<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - Abid Khan's E-Learning Hub</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Dashboard</h1>

<div id="cardContainer"></div> <!-- Cards will appear here -->

<script src="dashboard.js" defer></script>
  const users = [
  // Trainers
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
  },
  // Students
  {
    name: "Student One",
    title: "O-Level Student",
    image: "images/student-placeholder.jpg",
    profileUrl: "student-one.html"
  },
  {
    name: "Student Two",
    title: "A-Level Student",
    image: "images/student-placeholder.jpg",
    profileUrl: "student-two.html"
  }
];

const container = document.getElementById("cardContainer");

users.forEach(user => {
  const username = user.name.replace(/\s/g,''); // unique ID for each user
  const card = document.createElement("div");
  card.className = "card";

  card.innerHTML = `
    <img src="${user.image}" alt="${user.name}" id="img-${username}">
    <div class="card-content">
      <h3>${user.name}</h3>
      <p>${user.title}</p>
      <button onclick="window.location.href='${user.profileUrl}'">Visit Profile</button>
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
      document.getElementById(`img-${username}`).src = data.imageUrl;
      alert(`Image for ${username} uploaded successfully!`);
    }
  })
  .catch(err => {
    console.error(err);
    alert('Upload failed!');
  });
}

</body>
</html>
