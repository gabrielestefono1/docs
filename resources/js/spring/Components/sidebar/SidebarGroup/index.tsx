import { OrdenacaoGrupo } from "@/spring/interfaces/OrdenacaoGeral";
import SidebarItem from "../SidebarItem";
import styles from "./SidebarGroup.module.scss";
import { Link, usePage } from "@inertiajs/react";

interface SidebarItemProps {
    titulo: string;
    slug: string;
    slugNumber?: number;
    filhos?: OrdenacaoGrupo[];
}

export default function SidebarGroup({
    slugNumber = 1,
    titulo,
    slug,
    filhos = [],
}: Readonly<SidebarItemProps>) {
    const { url } = usePage();
    const active = `/${slug}` === url || url.includes(`/${slug}`);
    return (
        <>
            <Link href={`/${slug}`} className={styles.sidebarLink}>
                <button
                    className={`${styles.sidebarGroup} ${
                        active ? styles.active : ""
                    }`}
                >
                    <div></div>
                    <p>{titulo}</p>
                </button>
            </Link>
            {active &&
                filhos.map((filho) => {
                    if (
                        filho.ordenavel_type ===
                        "\\App\\Models\\spring\\Postagem"
                    ) {
                        return (
                            <div
                                className={styles.sidebarGroupItems}
                                key={`${filho.created_at}`}
                            >
                                <SidebarItem
                                    titulo={filho.ordenavel?.titulo ?? ""}
                                    slug={`${slug}/${
                                        filho.ordenavel?.slug ?? ""
                                    }`}
                                />
                            </div>
                        );
                    }
                    return (
                        <div
                            className={styles.sidebarGroupItems}
                            key={`${filho.created_at}`}
                        >
                            <SidebarGroup
                                slug={`${slug}/${filho.ordenavel?.slug ?? ""}`}
                                titulo={filho.ordenavel?.titulo ?? ""}
                                filhos={filho.ordenavel?.ordenacao_grupo}
                            />
                        </div>
                    );
                })}
        </>
    );
}
