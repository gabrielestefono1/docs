import { Link, usePage } from "@inertiajs/react";
import styles from "./SidebarItem.module.scss";

interface SidebarItemProps {
    titulo: string;
    slug: string;
}

export default function SidebarItem({
    titulo,
    slug,
}: Readonly<SidebarItemProps>) {
    const { url } = usePage();
    const active = `/${slug}` === url;
    return (
        <Link href={`/${slug}`} className={styles.sidebarLink}>
            <button
                className={`${styles.sidebarItem} ${
                    active ? styles.active : ""
                }`}
            >
                {titulo}
            </button>
        </Link>
    );
}
