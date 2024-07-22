import { ReactNode } from "react";
import styles from "./UtilOption.module.scss";

interface UtilOptionProps {
    texto: string;
    icone: ReactNode;
}

export default function UtilOption({
    icone,
    texto,
}: Readonly<UtilOptionProps>) {
    return (
        <button className={styles.utilOption}>
            {icone}
            {texto}
        </button>
    );
}
