import { Link, usePage } from "@inertiajs/react";
import styles from "./singleMenu.module.scss";

export default function SingleMenu() {
    const active = true;
    return (
        <Link
            href={`/referencia`}
            className={`${styles.single} ${active ? styles.active : ""}`}
        >
            <div>sadasddas</div>
        </Link>
    );
}
