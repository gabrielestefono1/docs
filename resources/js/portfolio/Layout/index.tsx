import { Head } from "@inertiajs/react";
import favicon from "../images/favicon.ico";
import { ReactNode, useEffect } from "react";
import Header from "./Header";

export default function Layout({
    children,
    title,
}: Readonly<{ children: ReactNode; title: string }>) {
    const body = document.body;
    body.className = "portfólio";

    useEffect(() => {
        const head = document.head;
        let link = document.createElement("link");
        let oldLink = document.getElementById("dynamic-link");
        if (oldLink) {
            head.removeChild(oldLink);
        }
        link.rel = "icon";
        link.type = "image/x-icon";
        link.href = favicon;
        link.id = "dynamic-link";
        head.appendChild(link);
    }, []);

    return (
        <>
            <Head title={title} />
            <Header/>
            <main>{children}</main>
            {/* <Footer></Footer> */}
        </>
    );
}
