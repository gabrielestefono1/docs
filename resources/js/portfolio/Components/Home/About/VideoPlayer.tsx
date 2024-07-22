import React, { useEffect, useRef } from "react";
import videojs, { VideoJsPlayerOptions, VideoJsPlayer } from "video.js";
import "video.js/dist/video-js.css";

interface VideoJSProps {
    options: VideoJsPlayerOptions;
}

export default function VideoJS({ options }: Readonly<VideoJSProps>) {
    const videoRef = useRef<HTMLDivElement>(null);
    const playerRef = useRef<VideoJsPlayer | null>(null);

    useEffect(() => {
        if (!videoRef.current) {
            return;
        }
        if (!playerRef.current) {
            const videoElement = document.createElement("video-js");
            videoElement.classList.add("vjs-big-play-centered");
            videoRef.current.appendChild(videoElement);
            playerRef.current = videojs(videoElement, options);
        } else {
            const player = playerRef.current;
            player.autoplay(options.autoplay ?? false);
            player.src(options.sources ?? []);
        }
    }, [options]);

    useEffect(() => {
        const player = playerRef.current;

        return () => {
            if (player && !player.isDisposed()) {
                player.dispose();
                playerRef.current = null;
            }
        };
    }, []);

    return (
        <div data-vjs-player>
            <div ref={videoRef} />
        </div>
    );
}
