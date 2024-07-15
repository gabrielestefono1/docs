import { Link, router, usePage } from "@inertiajs/react";
import styles from "./SidebarItem.module.scss";

interface SidebarItemProps {
    titulo: string;
    slug: string;
    slugNumber?: number;
}

export default function SidebarItem({
    titulo,
    slug,
    slugNumber = 1,
}: Readonly<SidebarItemProps>) {
    const { url } = usePage();
    const active = `/${slug}` === url;
    return (
        <Link href={`/${slug}`}>
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
