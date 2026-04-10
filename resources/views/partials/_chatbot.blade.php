<!-- ═══════════════════════════════════════════════════════════════
     iSWITCH SMART ASSISTANT — Floating Chatbot Widget
     Include this partial on any page: @include('partials._chatbot')
     ═══════════════════════════════════════════════════════════════ -->

<style>
    .isw-chat-fab {
        position: fixed;
        bottom: 100px;
        right: 24px;
        z-index: 9999;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(135deg, #FF7D00, #FF5500);
        color: white;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        box-shadow: 0 8px 32px rgba(255, 125, 0, 0.4);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .isw-chat-fab:hover {
        transform: scale(1.1);
        box-shadow: 0 12px 40px rgba(255, 125, 0, 0.5);
    }
    .isw-chat-fab .pulse-ring {
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        border: 2px solid #FF7D00;
        animation: isw-pulse 2s ease-out infinite;
    }
    @keyframes isw-pulse {
        0% { transform: scale(1); opacity: 0.6; }
        100% { transform: scale(1.8); opacity: 0; }
    }

    .isw-chat-window {
        position: fixed;
        bottom: 100px;
        right: 24px;
        z-index: 10000;
        width: 400px;
        max-width: calc(100vw - 32px);
        height: 560px;
        max-height: calc(100vh - 140px);
        border-radius: 24px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        background: #0a0f1a;
        border: 1px solid rgba(255, 255, 255, 0.08);
        box-shadow: 0 24px 80px rgba(0, 0, 0, 0.6), 0 0 0 1px rgba(255, 125, 0, 0.1);
        transform-origin: bottom right;
        animation: isw-chat-in 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    @keyframes isw-chat-in {
        0% { opacity: 0; transform: scale(0.9) translateY(20px); }
        100% { opacity: 1; transform: scale(1) translateY(0); }
    }

    .isw-chat-header {
        background: linear-gradient(135deg, #0f1729, #111827);
        padding: 16px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        flex-shrink: 0;
    }
    .isw-chat-header-left {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .isw-chat-avatar {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        background: linear-gradient(135deg, #FF7D00, #FF5500);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        color: white;
    }
    .isw-chat-header-text h4 {
        color: white;
        font-weight: 800;
        font-size: 14px;
        margin: 0;
    }
    .isw-chat-header-text p {
        color: #34d399;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        margin: 2px 0 0 0;
        display: flex;
        align-items: center;
        gap: 4px;
    }
    .isw-chat-header-text p::before {
        content: '';
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #34d399;
        display: inline-block;
        animation: isw-pulse-dot 1.5s ease-in-out infinite;
    }
    @keyframes isw-pulse-dot {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.4; }
    }
    .isw-chat-close {
        background: rgba(255,255,255,0.06);
        border: 1px solid rgba(255,255,255,0.08);
        color: #94a3b8;
        width: 32px;
        height: 32px;
        border-radius: 10px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
        font-size: 14px;
    }
    .isw-chat-close:hover {
        background: rgba(255,255,255,0.1);
        color: white;
    }

    .isw-chat-messages {
        flex: 1;
        overflow-y: auto;
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 16px;
        scroll-behavior: smooth;
    }
    .isw-chat-messages::-webkit-scrollbar { width: 4px; }
    .isw-chat-messages::-webkit-scrollbar-track { background: transparent; }
    .isw-chat-messages::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 4px; }

    .isw-msg {
        max-width: 85%;
        padding: 12px 16px;
        border-radius: 16px;
        font-size: 13px;
        line-height: 1.6;
        word-wrap: break-word;
        animation: isw-msg-in 0.25s ease-out;
    }
    @keyframes isw-msg-in {
        0% { opacity: 0; transform: translateY(8px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .isw-msg-bot {
        align-self: flex-start;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.06);
        color: #e2e8f0;
    }
    .isw-msg-user {
        align-self: flex-end;
        background: linear-gradient(135deg, #FF7D00, #FF5500);
        color: white;
    }
    .isw-msg-bot strong, .isw-msg-bot b {
        color: #FF7D00;
    }
    .isw-msg-bot em, .isw-msg-bot i:not(.fa-solid):not(.fa-brands) {
        color: #94a3b8;
    }

    .isw-typing {
        align-self: flex-start;
        display: flex;
        gap: 4px;
        padding: 12px 16px;
    }
    .isw-typing span {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #FF7D00;
        animation: isw-bounce 1.2s infinite;
    }
    .isw-typing span:nth-child(2) { animation-delay: 0.15s; }
    .isw-typing span:nth-child(3) { animation-delay: 0.3s; }
    @keyframes isw-bounce {
        0%, 60%, 100% { transform: translateY(0); opacity: 0.4; }
        30% { transform: translateY(-6px); opacity: 1; }
    }

    .isw-chat-input-bar {
        padding: 16px;
        border-top: 1px solid rgba(255, 255, 255, 0.06);
        background: #0d1220;
        display: flex;
        gap: 10px;
        align-items: center;
        flex-shrink: 0;
    }
    .isw-chat-input {
        flex: 1;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 14px;
        padding: 12px 16px;
        color: white;
        font-size: 13px;
        outline: none;
        font-family: 'Outfit', sans-serif;
        transition: border-color 0.2s;
    }
    .isw-chat-input:focus {
        border-color: rgba(255, 125, 0, 0.4);
    }
    .isw-chat-input::placeholder { color: #475569; }
    .isw-chat-send {
        width: 44px;
        height: 44px;
        border-radius: 14px;
        background: linear-gradient(135deg, #FF7D00, #FF5500);
        border: none;
        color: white;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        transition: all 0.2s;
        flex-shrink: 0;
    }
    .isw-chat-send:hover { transform: scale(1.05); }
    .isw-chat-send:disabled { opacity: 0.5; cursor: not-allowed; transform: none; }

    .isw-quick-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        padding: 0 16px 12px;
        flex-shrink: 0;
    }
    .isw-quick-btn {
        background: rgba(255, 255, 255, 0.04);
        border: 1px solid rgba(255, 255, 255, 0.08);
        color: #94a3b8;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        font-family: 'Outfit', sans-serif;
    }
    .isw-quick-btn:hover {
        background: rgba(255, 125, 0, 0.1);
        border-color: rgba(255, 125, 0, 0.3);
        color: #FF7D00;
    }

    @media(max-width: 639px) {
        .isw-chat-fab {
            bottom: 90px;
            right: 16px;
            width: 52px;
            height: 52px;
            font-size: 20px;
        }
        .isw-chat-window {
            bottom: 0;
            right: 0;
            width: 100vw;
            max-width: 100vw;
            height: 100vh;
            max-height: 100vh;
            border-radius: 0;
        }
    }
</style>

<div x-data="iSwitchChat()" x-cloak>

    <!-- Floating Action Button -->
    <button class="isw-chat-fab" @click="toggle()" x-show="!open" x-transition>
        <span class="pulse-ring"></span>
        <i class="fa-solid fa-comments"></i>
    </button>

    <!-- Chat Window -->
    <div class="isw-chat-window" x-show="open" x-transition>

        <!-- Header -->
        <div class="isw-chat-header">
            <div class="isw-chat-header-left">
                <div class="isw-chat-avatar">
                    <img src="/iswitch_brand_logo.png" onerror="this.onerror=null; this.src='https://iswitch.onrender.com/iswitch_brand_logo.png'" class="w-6 h-auto">
                </div>
                <div class="isw-chat-header-text">
                    <h4>iSwitch Smart Guide</h4>
                    <p>Powered by iSwitch Intelligence</p>
                </div>
            </div>
            <button class="isw-chat-close" @click="open = false"><i class="fa-solid fa-xmark"></i></button>
        </div>

        <!-- Messages -->
        <div class="isw-chat-messages" x-ref="messages">
            <template x-for="(msg, i) in messages" :key="i">
                <div :class="msg.from === 'bot' ? 'isw-msg isw-msg-bot' : 'isw-msg isw-msg-user'" x-html="formatMessage(msg.text)"></div>
            </template>
            <div class="isw-typing" x-show="typing">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="isw-quick-actions" x-show="messages.length <= 1">
            <button class="isw-quick-btn" @click="send('Search flights')">✈️ Flights</button>
            <button class="isw-quick-btn" @click="send('Find hotels')">🏨 Hotels</button>
            <button class="isw-quick-btn" @click="send('Visa check')">📋 Visas</button>
            <button class="isw-quick-btn" @click="send('Travel insurance')">🛡️ Insurance</button>
            <button class="isw-quick-btn" @click="send('Tours')">🌍 Tours</button>
            <button class="isw-quick-btn" @click="send('Speak to agent')">📞 Agent</button>
        </div>

        <!-- Input -->
        <div class="isw-chat-input-bar">
            <input class="isw-chat-input"
                   type="text"
                   placeholder="Ask about flights, hotels, visas..."
                   x-model="input"
                   @keydown.enter="send()"
                   :disabled="typing"
                   x-ref="chatInput">
            <button class="isw-chat-send" @click="send()" :disabled="typing || !input.trim()">
                <i class="fa-solid fa-paper-plane"></i>
            </button>
        </div>
    </div>
</div>

<script>
function iSwitchChat() {
    return {
        open: false,
        input: '',
        typing: false,
        messages: [
            {
                from: 'bot',
                text: "✈️ Welcome to **iSwitch**!\n\nI am your global travel companion. I can search live flights, find boutique hotels, check visa requirements, and secure your travel insurance instantly.\n\nHow can I help you explore today?"
            }
        ],

        toggle() {
            this.open = !this.open;
            if (this.open) {
                this.$nextTick(() => {
                    this.$refs.chatInput?.focus();
                    this.scrollToBottom();
                });
            }
        },

        async send(preset = null) {
            const text = preset || this.input.trim();
            if (!text) return;

            // Add user message
            this.messages.push({ from: 'user', text });
            this.input = '';
            this.typing = true;
            this.scrollToBottom();

            try {
                const res = await fetch('/api/v1/chat', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ message: text })
                });
                const data = await res.json();

                // Simulate brief typing delay for natural feel
                await new Promise(r => setTimeout(r, 600 + Math.random() * 800));

                this.messages.push({ from: 'bot', text: data.reply || "Sorry, I didn't catch that. Try again!" });
            } catch (e) {
                await new Promise(r => setTimeout(r, 500));
                this.messages.push({ from: 'bot', text: "I'm having trouble connecting right now. Please try again in a moment. 🔄" });
            } finally {
                this.typing = false;
                this.scrollToBottom();
            }
        },

        formatMessage(text) {
            if (!text) return '';
            // Convert markdown-style bold
            let html = text.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
            // Convert markdown-style italic
            html = html.replace(/\*(.*?)\*/g, '<em>$1</em>');
            // Convert newlines to br
            html = html.replace(/\n/g, '<br>');
            return html;
        },

        scrollToBottom() {
            this.$nextTick(() => {
                if (this.$refs.messages) {
                    this.$refs.messages.scrollTop = this.$refs.messages.scrollHeight;
                }
            });
        }
    };
}
</script>
