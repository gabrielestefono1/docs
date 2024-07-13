import { Head } from "@inertiajs/react";
import { ReactNode, useContext } from "react";
import Header from "../Components/header";
import styles from "./layout.module.scss";
import Sidebar from "../Components/sidebar";
import InfoBar from "../Components/infoBar";
import { OrdemContext } from "../contexts/OrdemContext";
import { Ordem } from "../interfaces/OrdenacaoGeral";

export default function Layout({
    children,
    title,
    ordens,
}: Readonly<{ children: ReactNode; title: string; ordens: Ordem[] }>) {
    const body = document.body;
    body.className = "spring";

    const { setData } = useContext(OrdemContext);
    setData(ordens);
    return (
        <>
            <Head title={title} />
            <Header />
            <section className={styles.layout}>
                <Sidebar />
                <div className={styles.content}>
                    {children}
                    <InfoBar />
                </div>
            </section>
            <div>Footer</div>
        </>
    );
}
