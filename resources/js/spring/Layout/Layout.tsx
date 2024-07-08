import { Head } from "@inertiajs/react";
import { ReactNode } from "react";
import Header from "../Components/header";
import styles from "./layout.module.scss";
import Sidebar from "../Components/sidebar";
import InfoBar from "../Components/infoBar";

export default function Layout({
    children,
    title,
}: Readonly<{ children: ReactNode; title: string }>) {
    const body = document.body;
    body.className = "spring";
    return (
        <>
            <Head title={title} />
            <Header />
            <section className={styles.layout}>
                <Sidebar />
                <div className={styles.content}>
                    {children}
                    <InfoBar/>
                </div>
            </section>
            <div>Footer</div>
        </>
    );
}
