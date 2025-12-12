// ai-agent.js
async function askAgent() {
  const input = document.getElementById("question");
  const message = input.value.trim();
  if (!message) return;

  addMessage(message, 'user'); // show user message
  input.value = '';
  scrollToBottom();

  try {
    const response = await fetch("https://your-backend-url/api/agent", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ message: message })
    });

    const data = await response.json();
    addMessage(data.reply || "Sorry, no response from AI.", 'ai');
    scrollToBottom();
  } catch (error) {
    addMessage("Error connecting to AI. Try again.", 'ai');
    console.error(error);
  }
}

// Add message to chat
function addMessage(text, sender) {
  const chatContainer = document.getElementById("chatContainer");
  const div = document.createElement("div");
  div.className = `message ${sender}`;
  div.innerText = text;
  chatContainer.appendChild(div);
}

// Scroll chat to bottom
function scrollToBottom() {
  const chatContainer = document.getElementById("chatContainer");
  chatContainer.scrollTop = chatContainer.scrollHeight;
}

// Allow Enter key to send message
function handleEnter(event) {
  if (event.key === "Enter") {
    askAgent();
  }
}
