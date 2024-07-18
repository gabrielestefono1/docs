import { Head } from "@inertiajs/react";
import { ReactNode, useEffect } from "react";
import Header from "../Components/header";
import favicon from "../images/favicon.png";

export default function Layout({
    children,
    title,
}: Readonly<{ children: ReactNode; title: string }>) {
    const body = document.body;
    body.className = "react";

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
            <Header />
            <div>{children}</div>
            <div>Footer</div>
        </>
    );
}
