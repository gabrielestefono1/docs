import { Head } from "@inertiajs/react";
import { ReactNode } from "react";
import Header from "../Components/header";

export default function Layout({
    children,
    title,
}: Readonly<{ children: ReactNode; title: string }>) {
    const body = document.body;
    body.className = "react";
    return (
        <>
            <Head title={title} />
            <Header />
            <div>{children}</div>
            <div>Footer</div>
        </>
    );
}
