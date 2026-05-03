@extends('layouts.guest.app')
@section('title', 'Nyumba iitu FM - 91.5 FM and Online')
@section('meta_description', 'Nyumba iitu FM is a streaming live on 91.5 FM in MT.Kenya Region and online. Tune in for music, news, and cultural Shows. Listen live on our website or mobile app. Wiigue wi mucii!')
@section('content')
<style>
    /* CSS THEME VARIABLES (dark default) */
    :root {
        --bg-gradient-start: #0a0a14;
        --bg-gradient-end: #10101e;
        --card-bg: rgba(18, 18, 32, 0.95);
        --card-border: rgba(59, 130, 246, 0.25);
        --text-primary: #f1f5f9;
        --text-secondary: #a0afc0;
        --accent: #3b82f6;
        --accent-glow: rgba(59, 130, 246, 0.5);
        --button-bg: linear-gradient(135deg, #2563eb, #1e40af);
        --button-hover: #3b82f6;
        --control-bg: #1e293b;
        --vol-thumb: #3b82f6;
        --modal-overlay: rgba(0, 0, 0, 0.8);
        --modal-bg: #111827;
        --modal-text: #e2e8f0;
        --border-light: rgba(59, 130, 246, 0.3);
        --eq-bar: linear-gradient(to top, #3b82f6, #93c5fd);
    }

    body.light-theme {
        --bg-gradient-start: #eef2ff;
        --bg-gradient-end: #dfe9fe;
        --card-bg: rgba(255, 255, 255, 0.96);
        --card-border: rgba(59, 130, 246, 0.4);
        --text-primary: #0f172a;
        --text-secondary: #334155;
        --accent: #2563eb;
        --accent-glow: rgba(37, 99, 235, 0.3);
        --button-bg: linear-gradient(135deg, #3b82f6, #1d4ed8);
        --control-bg: #e2e8f0;
        --vol-thumb: #2563eb;
        --modal-overlay: rgba(0, 0, 0, 0.5);
        --modal-bg: #ffffff;
        --modal-text: #1e293b;
        --border-light: #bfdbfe;
        --eq-bar: linear-gradient(to top, #3b82f6, #60a5fa);
    }

    .player-wrapper {
        background: linear-gradient(135deg, var(--bg-gradient-start), var(--bg-gradient-end));
        color: var(--text-primary);
        transition: background 0.3s ease, color 0.2s ease;
    }

    /* main app card */
    .app-container {
        background: var(--card-bg);
        backdrop-filter: blur(4px);
        border-radius: 2rem;
        padding: 2rem 1.8rem;
        max-width: 460px;
        width: 100%;
        box-shadow: 0 25px 45px -12px rgba(0, 0, 0, 0.4), 0 0 0 1px var(--card-border);
        transition: all 0.25s ease;
    }

    .app-container h1 {
        text-align: center;
        font-size: 2rem;
        font-weight: 700;
        background: linear-gradient(135deg, var(--accent) 0%, #a5c9ff 100%);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        letter-spacing: -0.3px;
    }

    .frequency {
        text-align: center;
        font-size: 0.9rem;
        font-weight: 500;
        color: var(--accent);
        background: rgba(59, 130, 246, 0.12);
        display: inline-block;
        width: auto;
        margin: 0.5rem auto 1.2rem;
        padding: 0.2rem 1rem;
        border-radius: 40px;
        letter-spacing: 0.5px;
        backdrop-filter: blur(2px);
    }

    /* album art minimal style */
    .album-art-container {
        position: relative;
        width: 230px;
        height: 230px;
        margin: 0 auto 1.5rem;
        border-radius: 28px;
        background: radial-gradient(circle at 30% 20%, var(--accent), #0b1120);
        box-shadow: 0 20px 35px -12px var(--accent-glow);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
    }

    .radio-icon {
        font-size: 5rem;
        color: white;
        filter: drop-shadow(0 8px 16px rgba(0, 0, 0, 0.3));
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.3rem;
    }

    .radio-icon i {
        font-size: 4.2rem;
    }

    .radio-icon span {
        font-size: 1.2rem;
        font-weight: 600;
        background: rgba(255,255,240,0.2);
        backdrop-filter: blur(4px);
        padding: 0.2rem 0.7rem;
        border-radius: 60px;
        letter-spacing: 1px;
    }

    /* equalizer */
    .equalizer {
        display: flex;
        justify-content: center;
        align-items: flex-end;
        gap: 8px;
        height: 50px;
        margin: 20px 0 15px;
    }

    .bar {
        width: 6px;
        background: var(--eq-bar);
        border-radius: 4px;
        animation: wave 1.2s ease-in-out infinite paused;
        transition: height 0.1s;
    }

    .app-container.playing .bar {
        animation-play-state: running;
    }

    .bar:nth-child(1) { animation-delay: 0s; height: 16px; }
    .bar:nth-child(2) { animation-delay: 0.15s; }
    .bar:nth-child(3) { animation-delay: 0.3s; }
    .bar:nth-child(4) { animation-delay: 0.45s; }
    .bar:nth-child(5) { animation-delay: 0.6s; }

    @keyframes wave {
        0%, 100% { height: 18px; }
        50% { height: 48px; }
    }

    /* controls */
    .player-controls {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 28px;
        margin: 1rem 0 1.5rem;
    }

    .player-controls button {
        background: none;
        border: none;
        cursor: pointer;
        transition: transform 0.2s ease, filter 0.2s;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .control-btn {
        width: 54px;
        height: 54px;
        background: var(--control-bg);
        color: var(--accent);
        border-radius: 50%;
        font-size: 1.6rem;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(4px);
    }

    .control-btn:hover {
        transform: scale(1.08);
        background: var(--accent);
        color: white;
        box-shadow: 0 8px 18px var(--accent-glow);
    }

    #playBtn {
        width: 80px;
        height: 80px;
        background: var(--button-bg);
        color: white;
        font-size: 2rem;
        box-shadow: 0 10px 20px -5px var(--accent-glow);
    }

    #playBtn:hover {
        transform: scale(1.05);
        filter: brightness(1.05);
    }

    .control-btn:active, #playBtn:active {
        transform: scale(0.96);
    }

    /* volume slider */
    .volume-control {
        width: 100%;
        height: 5px;
        -webkit-appearance: none;
        background: rgba(100, 116, 139, 0.4);
        border-radius: 10px;
        outline: none;
        margin-top: 0.8rem;
    }

    .volume-control::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 18px;
        height: 18px;
        background: var(--vol-thumb);
        border-radius: 50%;
        cursor: pointer;
        box-shadow: 0 0 6px var(--accent);
        border: 2px solid white;
    }

    /* MODAL */
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: var(--modal-overlay);
        backdrop-filter: blur(6px);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
        visibility: hidden;
        opacity: 0;
        transition: visibility 0.2s, opacity 0.2s;
    }

    .modal.active {
        visibility: visible;
        opacity: 1;
    }

    .modal-card {
        background: var(--modal-bg);
        max-width: 320px;
        width: 85%;
        padding: 1.6rem 1.5rem;
        border-radius: 2rem;
        text-align: center;
        box-shadow: 0 30px 40px rgba(0, 0, 0, 0.3);
        border: 1px solid var(--border-light);
    }

    .modal-card i.fa-radio {
        font-size: 2.5rem;
        color: var(--accent);
        margin-bottom: 0.8rem;
    }

    .modal-card h3 {
        font-size: 1.4rem;
        margin-bottom: 0.5rem;
        color: var(--text-primary);
    }

    .modal-card p {
        color: var(--text-secondary);
        font-size: 0.9rem;
        margin: 0.5rem 0 1.5rem;
    }

    .modal-buttons {
        display: flex;
        gap: 12px;
        justify-content: center;
    }

    .modal-btn {
        padding: 0.5rem 1.2rem;
        border-radius: 40px;
        font-weight: 600;
        border: none;
        background: var(--control-bg);
        color: var(--text-primary);
        cursor: pointer;
        transition: all 0.2s;
    }

    .modal-btn.primary {
        background: var(--accent);
        color: white;
    }

    .modal-btn.primary:hover {
        filter: brightness(1.1);
    }

    .modal-btn:hover {
        transform: scale(0.97);
    }

    @media (max-width: 480px) {
        .app-container { padding: 1.5rem; }
        .album-art-container { width: 190px; height: 190px; }
        .radio-icon i { font-size: 3.2rem; }
    }
</style>

<div class="player-wrapper min-h-screen flex items-center justify-center p-5">
    <div class="max-w-7xl mx-auto w-full flex justify-center">
        <div class="app-container" id="radioApp">
            <h1>Nyumba iitu FM</h1>
            <div style="text-align: center;">
                <div class="frequency" id="freqDisplay">91.5 · Wiigue wi Mucii</div>
            </div>

            <div class="album-art-container">
                <div class="radio-icon">
                    <i class="fas fa-satellite-dish"></i>
                    <span>91.5</span>
                </div>
            </div>

            <div class="equalizer">
                <div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div>
            </div>

            <div class="player-controls">
                <button class="control-btn" id="prevBtn" aria-label="Previous frequency"><i class="fas fa-backward-step"></i></button>
                <button id="playBtn" aria-label="Play/Pause"><i class="fas fa-play" id="playIcon"></i></button>
                <button class="control-btn" id="nextBtn" aria-label="Next frequency"><i class="fas fa-forward-step"></i></button>
            </div>

            <input type="range" id="volume" class="volume-control" min="0" max="1" step="0.01" value="0.75">
            <div class="text-xs text-slate-400 text-center mt-3">🎚️ volume</div>
        </div>
    </div>
</div>

<div id="globalModal" class="modal">
    <div class="modal-card" id="modalContent">
        </div>
</div>

<audio id="audio" preload="none" crossorigin="anonymous"></audio>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const appContainer = document.getElementById("radioApp");
        const audioElem = document.getElementById("audio");
        const playBtn = document.getElementById("playBtn");
        const playIcon = document.getElementById("playIcon");
        const volumeSlider = document.getElementById("volume");
        const freqDisplay = document.getElementById("freqDisplay");
        const prevBtn = document.getElementById("prevBtn");
        const nextBtn = document.getElementById("nextBtn");

        const DEFAULT_STREAM_URL = "https://radio.nyumbaiitufm.co.ke/stream";
        const OFFLINE_MP3_PATH = "{{ asset('offline.mp3') }}";

        let currentStreamUrl = DEFAULT_STREAM_URL;
        let isPlaying = false;
        let currentFrequency = 91.5;
        let errorModalActive = false;
        let usingOfflineMode = false;

        function updateFreqDisplay() {
            freqDisplay.textContent = `${currentFrequency.toFixed(1)} · Wiigue wi Mucii`;
        }

        function resetErrorGuard() { errorModalActive = false; }

        function showModal(title, message, buttons = []) {
            const modal = document.getElementById("globalModal");
            const modalContent = document.getElementById("modalContent");
            modalContent.innerHTML = `
                <i class="fas fa-radio"></i>
                <h3>${title}</h3>
                <p>${message}</p>
                <div class="modal-buttons" id="modalButtons"></div>
            `;
            const btnContainer = modalContent.querySelector("#modalButtons");
            buttons.forEach(btn => {
                const buttonEl = document.createElement("button");
                buttonEl.textContent = btn.label;
                buttonEl.className = `modal-btn ${btn.type === 'primary' ? 'primary' : ''}`;
                buttonEl.addEventListener("click", () => {
                    closeModal();
                    if (btn.action) btn.action();
                });
                btnContainer.appendChild(buttonEl);
            });
            modal.classList.add("active");
        }

        function closeModal() {
            const modal = document.getElementById("globalModal");
            modal.classList.remove("active");
        }

        function handleAudioError() {
            if (errorModalActive) return;
            if (usingOfflineMode) {
                errorModalActive = true;
                showModal("Playback Error", "Could not play offline backup. Check file availability.", [
                    { label: "Dismiss", type: "", action: () => { resetErrorGuard(); isPlaying = false; updatePlayButtonUI(false); appContainer.classList.remove("playing"); } }
                ]);
                return;
            }
            errorModalActive = true;
            if (!usingOfflineMode && !audioElem.src.includes('offline.mp3')) {
                showModal("Stream Unavailable", "The live radio stream seems offline. Would you like to switch to offline backup?", [
                    { label: "Listen offline", type: "primary", action: () => { switchToOfflineAndPlay(); } },
                    { label: "Cancel", type: "", action: () => {
                        resetErrorGuard();
                        isPlaying = false;
                        updatePlayButtonUI(false);
                        appContainer.classList.remove("playing");
                        audioElem.pause();
                    } }
                ]);
            } else {
                resetErrorGuard();
            }
        }

        function switchToOfflineAndPlay() {
            usingOfflineMode = true;
            currentStreamUrl = OFFLINE_MP3_PATH;
            audioElem.src = OFFLINE_MP3_PATH;
            audioElem.load();
            audioElem.play().then(() => {
                isPlaying = true;
                updatePlayButtonUI(true);
                appContainer.classList.add("playing");
                resetErrorGuard();
                freqDisplay.textContent = `${currentFrequency.toFixed(1)} · OFFLINE MODE`;
            }).catch(err => {
                console.warn("offline playback error", err);
                showModal("Missing File", "offline.mp3 not found in public folder. Please add the file.", [
                    { label: "Got it", type: "", action: () => { resetErrorGuard(); isPlaying=false; updatePlayButtonUI(false); appContainer.classList.remove("playing"); } }
                ]);
            });
        }

        function loadAndPlayStream() {
            if (!usingOfflineMode) {
                audioElem.src = currentStreamUrl;
                audioElem.load();
            }
            const playPromise = audioElem.play();
            if (playPromise !== undefined) {
                playPromise.then(() => {
                    isPlaying = true;
                    updatePlayButtonUI(true);
                    appContainer.classList.add("playing");
                    resetErrorGuard();
                }).catch(err => {
                    console.error("Play failed:", err);
                    if (!errorModalActive) handleAudioError();
                    else {
                        isPlaying = false;
                        updatePlayButtonUI(false);
                        appContainer.classList.remove("playing");
                    }
                });
            }
        }

        function updatePlayButtonUI(playing) {
            if (playing) {
                playIcon.className = "fas fa-pause";
                playBtn.setAttribute("aria-label", "Pause");
            } else {
                playIcon.className = "fas fa-play";
                playBtn.setAttribute("aria-label", "Play");
            }
        }

        function togglePlayback() {
            if (!isPlaying) {
                if (!audioElem.src || (usingOfflineMode && !audioElem.src.includes('offline.mp3')) || (!usingOfflineMode && audioElem.src !== DEFAULT_STREAM_URL && !audioElem.src.includes('offline.mp3'))) {
                    if (usingOfflineMode) {
                        audioElem.src = OFFLINE_MP3_PATH;
                        audioElem.load();
                    } else {
                        audioElem.src = DEFAULT_STREAM_URL;
                        audioElem.load();
                    }
                }
                loadAndPlayStream();
            } else {
                audioElem.pause();
                isPlaying = false;
                updatePlayButtonUI(false);
                appContainer.classList.remove("playing");
            }
        }

        volumeSlider.addEventListener("input", (e) => {
            audioElem.volume = parseFloat(e.target.value);
        });

        prevBtn.addEventListener("click", () => {
            currentFrequency = Math.max(87.5, currentFrequency - 0.5);
            updateFreqDisplay();
        });

        nextBtn.addEventListener("click", () => {
            currentFrequency = Math.min(108.0, currentFrequency + 0.5);
            updateFreqDisplay();
        });

        audioElem.addEventListener("error", () => {
            if (!errorModalActive) {
                handleAudioError();
            } else {
                if(isPlaying) { isPlaying = false; updatePlayButtonUI(false); appContainer.classList.remove("playing");}
            }
        });

        audioElem.addEventListener("canplaythrough", () => {
            if(!usingOfflineMode) resetErrorGuard();
        });

        audioElem.addEventListener("play", () => {
            isPlaying = true;
            updatePlayButtonUI(true);
            appContainer.classList.add("playing");
        });

        audioElem.addEventListener("pause", () => {
            isPlaying = false;
            updatePlayButtonUI(false);
            appContainer.classList.remove("playing");
        });

        audioElem.volume = 0.75;
        playBtn.addEventListener("click", togglePlayback);

        // Retrieve saved theme
        const savedTheme = localStorage.getItem("nyumba_theme");
        if (savedTheme === "light") document.body.classList.add("light-theme");

        updateFreqDisplay();
        audioElem.volume = volumeSlider.value;

        window.addEventListener("unhandledrejection", (event) => {
            if (event.reason?.name?.includes("NotAllowedError")) {
                showModal("Playback blocked", "Interact with player to enable audio.", [{ label:"OK", type:"primary", action:()=>{} }]);
            }
        });
    });
</script>
@endsection
