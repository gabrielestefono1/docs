import { ReactNode } from "react";
import styles from "./UtilOption.module.scss";

interface UtilOptionProps {
    texto: string;
    icone: ReactNode;
    slug: string;
}

export default function UtilOption({
    icone,
    texto,
    slug,
}: Readonly<UtilOptionProps>) {

    const handleOpenNewTab = () => {
        window.open(slug, "_blank");
    };

    return (
        <button className={styles.utilOption} onClick={handleOpenNewTab}>
            {icone}
            {texto}
        </button>
    );
}
