// chatbot.js
window.addEventListener("DOMContentLoaded", () => {
    const dfScript = document.createElement("script");
    dfScript.src = "https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1";
    dfScript.async = true;
    document.body.appendChild(dfScript);
  
    const dfMessenger = document.createElement("df-messenger");
    dfMessenger.setAttribute("chat-title", "SIAP BELAJAR");
    dfMessenger.setAttribute("agent-id", "1d340160-d68d-473f-9818-48d901f2adee");
    dfMessenger.setAttribute("language-code", "id");
    dfMessenger.setAttribute("chat-icon", "https://upload.wikimedia.org/wikipedia/commons/6/6b/Chat_icon.svg");
  
    document.body.appendChild(dfMessenger);
  });
  