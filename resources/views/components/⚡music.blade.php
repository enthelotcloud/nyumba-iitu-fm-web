<?php
use Livewire\Component;

new class extends Component {
    // Server-side logic for the player (if needed later)
};
?>

<div>
    <div class="w-full bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-200 overflow-hidden relative" id="radioApp" style="font-family: 'Poppins', sans-serif;">

        <style>
            .reactor-container {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 6px;
                height: 40px;
            }
            .reactor-bar {
                width: 5px;
                background-color: rgba(255, 255, 255, 0.95);
                border-radius: 9999px;
                transform-origin: bottom;
                transition: height 0.2s ease;
            }
            /* Default heights when stopped or loading */
            .reactor-bar:nth-child(1), .reactor-bar:nth-child(7) { height: 8px; }
            .reactor-bar:nth-child(2), .reactor-bar:nth-child(6) { height: 16px; }
            .reactor-bar:nth-child(3), .reactor-bar:nth-child(5) { height: 24px; }
            .reactor-bar:nth-child(4) { height: 32px; }

            /* Bouncing animation ONLY when actively playing */
            #radioApp.playing .reactor-bar {
                animation: bounce 0.6s infinite alternate ease-in-out;
            }
            #radioApp.playing .reactor-bar:nth-child(1) { animation-delay: 0.1s; }
            #radioApp.playing .reactor-bar:nth-child(2) { animation-delay: 0.3s; }
            #radioApp.playing .reactor-bar:nth-child(3) { animation-delay: 0.0s; }
            #radioApp.playing .reactor-bar:nth-child(4) { animation-delay: 0.4s; }
            #radioApp.playing .reactor-bar:nth-child(5) { animation-delay: 0.2s; }
            #radioApp.playing .reactor-bar:nth-child(6) { animation-delay: 0.5s; }
            #radioApp.playing .reactor-bar:nth-child(7) { animation-delay: 0.1s; }

            @keyframes bounce {
                0% { transform: scaleY(0.3); }
                100% { transform: scaleY(1.2); }
            }
        </style>

        <div class="p-5 sm:p-6 md:p-8 flex flex-col md:flex-row gap-6 md:gap-8">

            <div class="relative w-full md:w-64 h-56 md:h-64 rounded-3xl bg-gradient-to-br from-blue-950 via-blue-900 to-blue-700 shadow-xl shadow-blue-900/20 flex-shrink-0 flex flex-col items-center justify-center overflow-hidden group">

                <div class="absolute top-0 inset-x-0 h-24 bg-gradient-to-b from-white/10 to-transparent"></div>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-24 h-24 text-white/10 absolute inset-0 m-auto transform -translate-y-4 transition-transform duration-500 group-hover:scale-110">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.288 15.038a5.25 5.25 0 0 1 7.424 0M5.106 11.856c3.807-3.808 9.98-3.808 13.788 0M1.924 8.674c5.565-5.565 14.587-5.565 20.152 0M12.53 18.22l-.53.106-1.061.212a.75.75 0 0 0-.623.992l1.698 5.093c.153.458.825.458.978 0l1.698-5.093a.75.75 0 0 0-.623-.992l-1.061-.212-.53-.106Z" />
                </svg>

                <div class="reactor-container relative z-10 translate-y-4">
                    <div class="reactor-bar"></div>
                    <div class="reactor-bar"></div>
                    <div class="reactor-bar"></div>
                    <div class="reactor-bar"></div>
                    <div class="reactor-bar"></div>
                    <div class="reactor-bar"></div>
                    <div class="reactor-bar"></div>
                </div>

            </div>

            <div class="flex-1 flex flex-col justify-between py-1 md:py-2">

                <div class="flex flex-col sm:flex-row sm:justify-between items-start sm:items-center gap-4 mb-6">
                    <div>
                        <div class="flex items-center flex-wrap gap-2 mb-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 text-blue-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 13.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 10.5a3.75 3.75 0 1 0 7.5 0M5.25 8.25a6.75 6.75 0 1 0 13.5 0" />
                            </svg>
                            <span class="text-blue-600 font-bold text-sm tracking-wide">91.5 FM</span>

                            <span id="statusBadge" class="hidden ml-1 sm:ml-2 px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-widest text-white transition-colors duration-300">
                                Live
                            </span>
                        </div>
                        <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight">Nyumba iitu FM</h1>
                        <p class="text-slate-500 text-sm mt-0.5">Wiigue wi Mucii</p>
                    </div>

                    <div class="flex items-center self-start sm:self-auto gap-1.5 bg-slate-50 border border-slate-200 text-slate-600 px-3 py-1.5 rounded-xl shadow-sm shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-blue-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span id="liveClock" class="text-sm font-bold tracking-wider">00:00:00 EAT</span>
                    </div>
                </div>

                <div class="flex-1"></div> <div class="flex items-center gap-3 sm:gap-4 md:gap-6 bg-slate-50 border border-slate-100 p-2 md:p-3 rounded-[2rem]">

                    <button id="playStopBtn" class="shrink-0 w-12 h-12 md:w-14 md:h-14 rounded-full bg-blue-600 hover:bg-blue-700 text-white shadow-lg shadow-blue-600/30 flex items-center justify-center transition-all hover:scale-105 active:scale-95 focus:outline-none" aria-label="Play">

                        <svg id="iconPlay" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 md:w-7 md:h-7 ml-1">
                            <path fill-rule="evenodd" d="M4.5 5.653c0-1.427 1.529-2.33 2.779-1.643l11.54 6.347c1.295.712 1.295 2.573 0 3.286L7.28 19.99c-1.25.687-2.779-.217-2.779-1.643V5.653Z" clip-rule="evenodd" />
                        </svg>

                        <svg id="iconStop" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 md:w-7 md:h-7 hidden">
                            <path fill-rule="evenodd" d="M4.5 7.5a3 3 0 0 1 3-3h9a3 3 0 0 1 3 3v9a3 3 0 0 1-3 3h-9a3 3 0 0 1-3-3v-9Z" clip-rule="evenodd" />
                        </svg>

                        <svg id="iconLoading" class="animate-spin w-6 h-6 md:w-7 md:h-7 hidden text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>

                    </button>

                    <div class="flex-1 flex items-center gap-2 sm:gap-3 pr-2 sm:pr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 sm:w-5 sm:h-5 text-slate-400 shrink-0">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 19.5l-3-3h-3a1.5 1.5 0 01-1.5-1.5v-6a1.5 1.5 0 011.5-1.5h3l3-3v15z" />
                        </svg>

                        <input type="range" id="volume" min="0" max="1" step="0.01" value="1"
                            class="w-full h-1.5 bg-slate-200 rounded-lg appearance-none cursor-pointer accent-blue-600 hover:accent-blue-700 focus:outline-none">

                        <span id="volPercent" class="text-[10px] sm:text-xs font-bold text-slate-500 w-8 sm:w-10 text-right shrink-0">100%</span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="globalModal" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-50 hidden flex items-center justify-center transition-opacity duration-300 opacity-0" style="transition: opacity 0.3s ease;">
        <div class="bg-white rounded-3xl p-6 sm:p-8 max-w-sm w-[90%] text-center shadow-2xl transform scale-95 transition-transform duration-300" id="modalCard" style="font-family: 'Poppins', sans-serif;">
            <div id="modalContent"></div>
        </div>
    </div>

    <audio id="audio" preload="none" crossorigin="anonymous"></audio>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const appContainer = document.getElementById("radioApp");
            const audioElem = document.getElementById("audio");
            const playStopBtn = document.getElementById("playStopBtn");

            const iconPlay = document.getElementById("iconPlay");
            const iconStop = document.getElementById("iconStop");
            const iconLoading = document.getElementById("iconLoading");

            const volumeSlider = document.getElementById("volume");
            const volPercent = document.getElementById("volPercent");
            const statusBadge = document.getElementById("statusBadge");

            const modal = document.getElementById("globalModal");
            const modalCard = document.getElementById("modalCard");
            const clockDisplay = document.getElementById("liveClock");

            const DEFAULT_STREAM_URL = "https://radio.nyumbaiitufm.co.ke/stream";
            const OFFLINE_MP3_PATH = "{{ asset('offline.mp3') }}";

            let isPlaying = false;
            let intentionalStop = true;
            let usingOfflineMode = false;

            // Clock Logic
            function updateClock() {
                const now = new Date();
                const options = { timeZone: 'Africa/Nairobi', hour12: false, hour: '2-digit', minute: '2-digit', second: '2-digit' };
                clockDisplay.textContent = now.toLocaleTimeString('en-US', options) + " EAT";
            }
            setInterval(updateClock, 1000);
            updateClock();

            // Volume Logic
            function updateVolume() {
                const val = parseFloat(volumeSlider.value);
                audioElem.volume = val;
                volPercent.textContent = Math.round(val * 100) + "%";
            }
            volumeSlider.addEventListener("input", updateVolume);
            updateVolume();

            // UI State Manager
            function setPlayerState(state, text = '') {
                iconPlay.classList.add("hidden");
                iconStop.classList.add("hidden");
                iconLoading.classList.add("hidden");
                appContainer.classList.remove("playing");
                statusBadge.classList.add("hidden");

                if (state === 'loading') {
                    isPlaying = false;
                    iconLoading.classList.remove("hidden");
                    playStopBtn.setAttribute("aria-label", "Loading");

                    statusBadge.classList.remove("hidden");
                    statusBadge.textContent = text || "Connecting...";
                    statusBadge.className = "ml-1 sm:ml-2 px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-widest text-white bg-blue-500 shadow-[0_0_8px_rgba(59,130,246,0.5)]";

                } else if (state === 'playing') {
                    isPlaying = true;
                    appContainer.classList.add("playing");
                    iconStop.classList.remove("hidden");
                    playStopBtn.setAttribute("aria-label", "Stop");

                    statusBadge.classList.remove("hidden");
                    statusBadge.textContent = text || "Live";
                    if(text === 'Offline') {
                        statusBadge.className = "ml-1 sm:ml-2 px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-widest text-white bg-slate-500";
                    } else {
                        statusBadge.className = "ml-1 sm:ml-2 px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-widest text-white bg-red-500 shadow-[0_0_8px_rgba(239,68,68,0.5)]";
                    }

                } else {
                    isPlaying = false;
                    iconPlay.classList.remove("hidden");
                    playStopBtn.setAttribute("aria-label", "Play");
                }
            }

            // Playback Logic
            function togglePlayback() {
                if (!isPlaying && iconLoading.classList.contains("hidden")) {
                    intentionalStop = false;
                    setPlayerState('loading');

                    if (!usingOfflineMode) {
                        audioElem.src = DEFAULT_STREAM_URL;
                    }
                    audioElem.load();

                    audioElem.play().catch(err => {
                        if(err.name !== 'NotAllowedError') {
                            handleStreamError();
                        } else {
                            setPlayerState('stopped');
                        }
                    });

                } else {
                    intentionalStop = true;
                    audioElem.pause();
                    audioElem.src = "";
                    audioElem.load();
                    setPlayerState('stopped');
                }
            }

            playStopBtn.addEventListener("click", togglePlayback);

            // Audio Listeners
            audioElem.addEventListener("playing", () => {
                setPlayerState('playing', usingOfflineMode ? 'Offline' : 'Live');
            });

            audioElem.addEventListener("waiting", () => {
                if (!intentionalStop) setPlayerState('loading', 'Buffering...');
            });

            audioElem.addEventListener("error", () => {
                if (!intentionalStop) handleStreamError();
            });

            // Error Logic
            function handleStreamError() {
                if (audioElem.src.includes('offline.mp3')) {
                    setPlayerState('stopped');
                    showModal("Playback Error", "The backup track could not be loaded.", [
                        { label: "Dismiss", type: "secondary", action: () => {} }
                    ]);
                    return;
                }

                setPlayerState('stopped');
                showModal("Stream is Offline", "The live broadcast is currently unreachable. Would you like to listen to our backup mix?", [
                    { label: "Play Backup", type: "primary", action: () => { playOfflineBackup(); } },
                    { label: "Cancel", type: "secondary", action: () => {} }
                ]);
            }

            function playOfflineBackup() {
                intentionalStop = false;
                usingOfflineMode = true;
                setPlayerState('loading', 'Loading Mix...');
                audioElem.src = OFFLINE_MP3_PATH;
                audioElem.load();
                audioElem.play().catch(err => {
                    handleStreamError();
                });
            }

            // Modal Logic
            function showModal(title, message, buttons = []) {
                const modalContent = document.getElementById("modalContent");
                modalContent.innerHTML = `
                    <div class="w-12 h-12 sm:w-16 sm:h-16 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-4 border border-red-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 sm:w-8 sm:h-8 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h3 class="text-lg sm:text-xl font-bold text-slate-800 mb-2">${title}</h3>
                    <p class="text-slate-500 text-xs sm:text-sm mb-6">${message}</p>
                    <div class="flex gap-2 sm:gap-3 justify-center" id="modalButtons"></div>
                `;
                const btnContainer = modalContent.querySelector("#modalButtons");
                buttons.forEach(btn => {
                    const buttonEl = document.createElement("button");
                    buttonEl.textContent = btn.label;
                    if(btn.type === 'primary') {
                        buttonEl.className = "bg-blue-600 text-white px-4 py-2 sm:px-5 sm:py-2.5 rounded-xl font-semibold text-xs sm:text-sm hover:bg-blue-700 transition-colors";
                    } else {
                        button.className = "bg-slate-100 text-slate-700 px-4 py-2 sm:px-5 sm:py-2.5 rounded-xl font-semibold text-xs sm:text-sm hover:bg-slate-200 transition-colors";
                    }
                    buttonEl.addEventListener("click", () => {
                        closeModal();
                        if (btn.action) btn.action();
                    });
                    btnContainer.appendChild(buttonEl);
                });

                modal.classList.remove("hidden");
                setTimeout(() => {
                    modal.classList.remove("opacity-0");
                    modalCard.classList.remove("scale-95");
                }, 10);
            }

            function closeModal() {
                modal.classList.add("opacity-0");
                modalCard.classList.add("scale-95");
                setTimeout(() => { modal.classList.add("hidden"); }, 300);
            }
        });
    </script>
</div>
