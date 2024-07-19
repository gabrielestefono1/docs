import styles from "./HeroSection.module.scss";
import { useEffect, useRef, useState } from "react";
import bg1 from "./bg1.webp";
import bg2 from "./bg2.webp";
import bg3 from "./bg3.webp";
import bg4 from "./bg4.webp";
import bg5 from "./bg5.webp";

export default function HeroSection() {

  const divBg = useRef<HTMLDivElement | null>(null);

  const [bgLoaded, setBgLoaded] = useState<boolean>(false);

  useEffect(() => {
    const elementoRecebido = divBg.current;
    const larguraTela = window.innerWidth;

    let backgroundImageSrc: string = "";

    if (larguraTela <= 768) {
      backgroundImageSrc = bg1;
    } else if (larguraTela <= 1024) {
      backgroundImageSrc = bg2;
    } else if (larguraTela <= 1280) {
      backgroundImageSrc = bg3;
    } else if (larguraTela <= 1440) {
      backgroundImageSrc = bg4;
    } else {
      backgroundImageSrc = bg5;
    }

    const backgroundImage = new Image();

    backgroundImage.loading = "eager";

    backgroundImage.src = backgroundImageSrc;

    if(!elementoRecebido){
      return;
    }

    backgroundImage.onload = () => {
      elementoRecebido.style.backgroundImage = `url(${backgroundImageSrc})`;
      setBgLoaded(true);
    };
  }, []);

  return (
    <div className={styles.herosection} ref={divBg}>
      {bgLoaded && <div>Testando</div>}
    </div>
  );
}
