import { useContext } from "react";
import styles from "./infoBar.module.scss";
import { TituloContext } from "@/spring/contexts/TitulosContext";

interface InfoBarProps {
    pagina: string;
}

export default function InfoBar({ pagina }: Readonly<InfoBarProps>) {
    const { data } = useContext(TituloContext);
    return (
        <div className={styles.info}>
            <div>
                {data.length > 0 && <h3>{pagina}</h3>}
                {data.map((titulo) => (
                    <a href="/" key={titulo.id}>
                        {titulo.titulo}
                    </a>
                ))}
            </div>
        </div>
    );
}
