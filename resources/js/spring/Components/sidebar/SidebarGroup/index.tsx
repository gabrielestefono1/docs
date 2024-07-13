import { Ordenavel } from "@/spring/interfaces/OrdenacaoGeral";
import SidebarItem from "../SidebarItem";
import styles from "./SidebarGroup.module.scss";

interface SidebarItemProps{
    titulo: string;
    active?: boolean;
}

export default function SidebarGroup({
    active = false,
    titulo,
}: Readonly<SidebarItemProps>) {
    return (
        <>
            <button
                className={`${styles.sidebarGroup} ${
                    active ? styles.active : ""
                }`}
            >
                <div></div>
                <p>{titulo}</p>
            </button>
            {/* {active && filhos.map(filho => (
                <div className={styles.sidebarGroupItems}>
                    <SidebarItem titulo=""/>
                </div>
            ))} */}
        </>
    );
}
