import { useEffect, useRef } from "react";
import videojs from "video.js";
import "video.js/dist/video-js.min.css";

export default function VideoJS() {
    const videoRef = useRef<HTMLVideoElement>(null);

    useEffect(() => {
        if (videoRef.current) {
            const player = videojs(videoRef.current, {
                controls: true,
                autoplay: false,
                preload: "auto",
                controlBar: {
                    children: [
                        "playToggle", // Botão de play/pause
                        "currentTimeDisplay", // Tempo atual
                        "durationDisplay", // Duração total
                        "progressControl", // Barra de progresso
                        "volumePanel", // Controle de volume
                        "fullscreenToggle", // Alternar tela cheia
                    ],
                },
            });

            // player.on("timeupdate", () => {
            //     console.log(player.controls());
            // });
        }
    }, []);

    return (
        <video
            id="vid1"
            className="video-js"
            ref={videoRef}
            style={{ height: "22.5rem" }}
        >
            <source src="./teste.mp4" />
        </video>
    );
}
