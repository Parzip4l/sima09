const chatForm = document.getElementById('chat-form');
const chatInput = document.getElementById('chat-input');
const chatLog = document.querySelector('.chat-log');

chatForm.addEventListener('submit', (event) => {
    event.preventDefault();
    const message = chatInput.value.trim();
    if (message === '') {
        return;
    }
    addChatMessage('You', message);
    sendChatMessage(message);
    chatInput.value = '';
});

function addChatMessage(sender, message) {
    const chatMessage = document.createElement('div');
    chatMessage.classList.add('chat-message');
    chatMessage.innerHTML = `
        <strong>${sender}:</strong>
        <span>${message}</span>
    `;
    chatLog.appendChild(chatMessage);
}

async function sendChatMessage(message) {
    const response = await fetch('/api/chat', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            message: message,
        }),
    });
    const data = await response.json();
    const chatbotMessage = data.message;
    addChatMessage('ChatBot', chatbotMessage);
}