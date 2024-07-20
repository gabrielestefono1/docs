import { Link, usePage } from "@inertiajs/react";
import styles from "./LinkCustom.module.scss";

interface LinkCustomProps {
    text: string;
    url: string;
    mobile?: boolean;
}

export default function LinkCustom({
    text,
    url,
    mobile = false,
}: Readonly<LinkCustomProps>) {
    const rotaAtual = usePage();
    const active = url === rotaAtual.url;
    return (
        <Link
            className={`${styles.link} ${active && styles.active} ${
                mobile ? styles.mobile : styles.desktop
            }`}
            href={url}
        >
            {" "}
            {text}{" "}
        </Link>
    );
}
