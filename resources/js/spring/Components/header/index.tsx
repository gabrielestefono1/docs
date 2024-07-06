import { Link } from "@inertiajs/react";
import styles from "./Header.module.scss";
import springLogo from "./spring-logo.svg";
import github from "./github.svg";

export default function Header() {
    return (
        <header className={styles.header}>
            <div>
                <div>
                    <Link href="/">
                        <img
                            src={springLogo}
                            alt="Logotipo do Spring em modo dark"
                        />
                    </Link>
                </div>
            </div>
        </header>
    );
}
