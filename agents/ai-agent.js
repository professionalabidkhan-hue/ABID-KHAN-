class AIAgent {
  constructor(name) {
    this.name = name;
  }

  respond(message) {
    return `Hello, I am ${this.name}. You said: ${message}`;
  }
}

module.exports = AIAgent;
