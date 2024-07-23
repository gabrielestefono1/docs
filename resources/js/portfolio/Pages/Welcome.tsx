import Layout from "../Layout";
import Presentation from "../Components/Presentation/Presentation";
import Separator from "../Components/Shared/Separator/Separator";
import About from "../Components/Home/About/About";
import Skills from "../Components/Home/Skills/Skills";

export default function Welcome() {
    return (
        <Layout title="Portfólio">
            <Presentation />
            <Separator titulo="Sobre" />
            <About />
            <Separator titulo="Projetos" />
            {/* <Project/> */}
            <Separator titulo="Habilidades" />
            <Skills />
            <Separator titulo="Contato" />
            {/* <ContactMe /> */}
            <Separator titulo="Perguntas Frequentes" />
            {/* <Faq /> */}
        </Layout>
    );
}
