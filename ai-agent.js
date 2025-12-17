const chatContainer = document.getElementById("chatContainer");
const input = document.getElementById("question");

// Handle Enter key
function handleEnter(event) {
  if (event.key === "Enter") {
    askAgent();
  }
}

// Handle Send button
async function askAgent() {
  const text = input.value.trim();
  if (text === "") return;

  // Show user message
  const userMsg = document.createElement("div");
  userMsg.className = "message user";
  userMsg.textContent = text;
  chatContainer.appendChild(userMsg);

  input.value = "";

  // Call backend API
  try {
    const response = await fetch("/chat", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ question: text })
    });

    const data = await response.json();

    // Show AI reply
    const aiMsg = document.createElement("div");
    aiMsg.className = "message ai";
    aiMsg.textContent = data.answer || "No reply received.";
    chatContainer.appendChild(aiMsg);

    // Scroll to bottom
    chatContainer.scrollTop = chatContainer.scrollHeight;
  } catch (error) {
    const errorMsg = document.createElement("div");
    errorMsg.className = "message ai";
    errorMsg.textContent = "Error contacting server.";
    chatContainer.appendChild(errorMsg);
  }
}
