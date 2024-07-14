import { OrdemContext } from "@/spring/contexts/OrdemContext";
import styles from "./sidebar.module.scss";
import { useContext } from "react";
import SidebarItem from "./SidebarItem";
import SidebarGroup from "./SidebarGroup";

export default function Sidebar() {
    const { data } = useContext(OrdemContext);

    return (
        <div className={styles.sidebar}>
            <div>
                <div>
                    <p>Spring Framework</p>
                    <button>•••</button>
                </div>
                <div>6.1.10</div>
            </div>
            <button>
                <div>
                    <div className={styles.magnifying}></div>
                    <span>Search</span>
                </div>
                <span>CTRL + K</span>
            </button>
            <div>
                {data.map((ordem) =>
                    ordem.ordenavel_type ==
                    "\\App\\Models\\spring\\Postagem" ? (
                        <SidebarItem
                            key={ordem.id}
                            titulo={ordem.ordenavel.titulo}
                        />
                    ) : (
                        <SidebarGroup
                            key={ordem.id}
                            titulo={ordem.ordenavel.titulo}
                            filhos={ordem.ordenavel.ordenacao_grupo}
                        />
                    )
                )}
            </div>
        </div>
    );
}
