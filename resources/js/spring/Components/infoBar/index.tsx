import { useContext } from "react";
import styles from "./infoBar.module.scss";
import { TituloContext } from "@/spring/contexts/TitulosContext";
import UtilOption from "./UtilOption";
import Printer from "@/spring/images/icons/printer";
import Speaker from "@/spring/images/icons/Speaker";
import AcademicCap from "@/spring/images/icons/AcademicCap";
import LightBulb from "@/spring/images/icons/LightBulb";
import Calendar from "@/spring/images/icons/Calendar";
import { usePage } from "@inertiajs/react";

interface InfoBarProps {
    pagina: string;
}

export default function InfoBar({ pagina }: Readonly<InfoBarProps>) {
    const { data } = useContext(TituloContext);

    const page = usePage();

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
            <div>
                <UtilOption icone={<Printer/>} texto="PDF" slug={`/pdf/generate_pdf${page.url}`}/>
                <UtilOption icone={<Printer/>} texto="DOCX" slug="/"/>
                <UtilOption icone={<AcademicCap/>} texto="Cursos Relacionados" slug="/"/>
                <UtilOption icone={<Speaker/>} texto="Leitor de Tela" slug="/"/>
                <UtilOption icone={<LightBulb/>} texto="Ideias" slug="/"/>
                <UtilOption icone={<Calendar/>} texto="Calendário" slug="/"/>
            </div>
        </div>
    );
}
