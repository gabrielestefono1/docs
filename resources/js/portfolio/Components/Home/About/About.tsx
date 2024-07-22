import videojs from "video.js";
import estilo from "./About.module.scss";
import illustracao1 from "./illustrative1.webp";
import illustracao2 from "./illustrative2.webp";
import ItemList from "./ItemsList";
import VideoPlayer from "./VideoPlayer";

export default function About() {

    return (
        <section className={estilo.about}>
            <div className={estilo.container}>
                <div className={estilo.left}>
                    <div className={estilo.title}>
                        <h3>Olá!</h3>
                        <h3>Meu nome é Gabriel Estéfono.</h3>
                    </div>
                    <div className={estilo.list}>
                        <ItemList texto="Desenvolvedor Full-Stack" />
                        <ItemList texto="Desenvolvedor Front-end" />
                        <ItemList texto="Desenvolvedor Back-end" />
                        <ItemList texto="HTML, CSS" />
                        <ItemList texto="JavaScript" />
                    </div>
                    <div className={estilo.buttons}>
                        <button className={estilo.first}>
                            Baixar currículo
                        </button>
                        <a href="/sobre">
                            <button className={estilo.second}>Leia mais</button>
                        </a>
                    </div>
                </div>
                <div className={estilo.right}>
                    <VideoPlayer />
                    {/* <img
                        src={illustracao1}
                        alt="Ilustração"
                        width={536}
                        height={435}
                        srcSet={`${illustracao2} 540w`}
                        sizes="(max-width: 767px) 360px, 536px"
                        loading="eager"
                    /> */}
                </div>
            </div>
        </section>
    );
}
