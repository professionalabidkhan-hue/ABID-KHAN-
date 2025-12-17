// Import dependencies
const express = require('express');
const AIAgent = require('./agents/ai-agent');
const ChatAgent = require('./agents/chat-agent');
const WhatsAppAgent = require('./agents/whatsapp-agent');

const app = express();
const PORT = process.env.PORT || 3000;

// Example agents
const ai = new AIAgent('FintechAI');
const chat = new ChatAgent('HelperBot');

// ⚠️ Use environment variable for sensitive data like phone numbers
const whatsappNumber = process.env.WHATSAPP_NUMBER || '+923000000000';
const whatsapp = new WhatsAppAgent(whatsappNumber);

// Routes
app.get('/', (req, res) => {
  res.send('Fintech Agents Server is running...');
});

app.get('/ai/:msg', (req, res) => {
  res.send(ai.respond(req.params.msg));
});

app.get('/chat/:msg', (req, res) => {
  res.send(chat.reply(req.params.msg));
});

app.get('/whatsapp/:msg', (req, res) => {
  res.send(whatsapp.sendMessage(req.params.msg));
});

// Start server
app.listen(PORT, () => {
  console.log(`Server running at http://localhost:${PORT}`);
});
