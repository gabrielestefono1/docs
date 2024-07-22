import { useEffect, useRef } from "react";
import videojs from "video.js";
import "video.js/dist/video-js.css";

export default function VideoPlayer() {
    const videoNode = useRef<HTMLVideoElement | null>(null);

    useEffect(() => {
        if (!videoNode.current) {
            return;
        }
        videojs(videoNode.current.id, {
            controls: true,
            autoplay: false,
            preload: "auto",
        });
    }, [videoNode]);

    return (
        <video className="video-js" id="aa" ref={videoNode}>
            <source src="./teste.mp4" type="video/mp4" />
        </video>
    );
}
