async function askAgent() {
  const userMessage = document.getElementById("question").value;

  const response = await fetch("https://your-backend-url/api/agent", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ message: userMessage })
  });

  const data = await response.json();
  document.getElementById("reply").innerText = data.reply;
}
