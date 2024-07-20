import { Head } from "@inertiajs/react";
import Layout from "../Layout";
import Presentation from "../Components/Presentation/Presentation";
import ButtonBars from "../Layout/Header/ButtonBars";

interface ReactProps {}

export default function Welcome({}: Readonly<ReactProps>) {
    return (
        <>
            <Layout title="Portfólio">
                <Presentation />
                {/* <Separator titulo="Sobre" /> */}
                {/* <About /> */}
                {/* <Separator titulo="Projetos" /> */}
                {/* <Project/> */}
                {/* <Separator titulo="Habilidades" /> */}
                {/* <Skills /> */}
                {/* <Separator titulo="Contato" /> */}
                {/* <ContactMe /> */}
                {/* <Separator titulo="Perguntas Frequentes" /> */}
                {/* <Faq /> */}
                <div></div>
            </Layout>
        </>
    );
}
