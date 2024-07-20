import { useEffect, useState } from "react";
import estilo from "./SideBar.module.scss";
import LinkCustom from "@/portfolio/Components/Shared/LinkCustom/LinkCustom";

interface SideBarProps {
    open: boolean;
}

export default function SideBar({ open }: Readonly<SideBarProps>) {
    return (
        <div className={open ? estilo.sidebar : estilo.sidebarHidden}>
            <LinkCustom text="Início" url="/" mobile />
            <LinkCustom text="Sobre mim" url="/sobre" mobile />
            <LinkCustom text="Projetos" url="/projetos" mobile />
            <LinkCustom text="Habilidades" url="/habilidades" mobile />
            <LinkCustom text="Contato" url="/contato" mobile />
        </div>
    );
}
