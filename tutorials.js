const tutorials = [
  {
    name: "Full Stack Web Development",
    image: "images/webdev.jpg",
    description: "Learn HTML, CSS, JavaScript, React, Node.js.",
    detailsUrl: "course-webdev.html"
  },
  {
    name: "Cybersecurity Fundamentals",
    image: "images/cybersecurity.jpg",
    description: "Protect systems and data from cyber threats.",
    detailsUrl: "course-cybersecurity.html"
  },
  {
    name: "Data Science & Analytics",
    image: "images/datascience.jpg",
    description: "Learn Python, Pandas, NumPy, Machine Learning.",
    detailsUrl: "course-datascience.html"
  }
];

const container = document.getElementById("tutorialContainer");

tutorials.forEach(course => {
  const card = document.createElement("div");
  card.className = "tutorial-card";

  card.innerHTML = `
    <img src="${course.image}" alt="${course.name}">
    <h3>${course.name}</h3>
    <p>${course.description}</p>
    <button onclick="window.location.href='${course.detailsUrl}'">View Details</button>
  `;

  container.appendChild(card);
});
