import { OrdenacaoGrupo, Ordenavel } from "@/spring/interfaces/OrdenacaoGeral";
import SidebarItem from "../SidebarItem";
import styles from "./SidebarGroup.module.scss";

interface SidebarItemProps {
    titulo: string;
    active?: boolean;
    filhos?: OrdenacaoGrupo[];
}

export default function SidebarGroup({
    active = true,
    titulo,
    filhos = [],
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
            {active &&
                filhos.map((filho) => {
                    if (
                        filho.ordenavel_type ===
                        "\\App\\Models\\spring\\Postagem"
                    ) {
                        return (
                            <div className={styles.sidebarGroupItems} key={`${filho.created_at}`}>
                                <SidebarItem
                                    titulo={filho.ordenavel?.titulo ?? ""}
                                />
                            </div>
                        );
                    }
                    return (
                        <div className={styles.sidebarGroupItems} key={`${filho.created_at}`}>
                            <SidebarGroup
                                titulo={filho.ordenavel?.titulo ?? ""}
                                filhos={filho.ordenavel?.ordenacao_grupo}
                            />
                        </div>
                    );
                })}
        </>
    );
}
