import { Link } from "@inertiajs/react";
import styles from "./index.module.scss";

export default function Main() {
    return (
        <div className={styles.main}>
            <div>
                <Link href="/">Spring Framework</Link>
                <span>/</span>
                <Link href="/">Spring Framework Documentation</Link>
            </div>
        </div>
    );
}
