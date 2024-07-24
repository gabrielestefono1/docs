import Layout from "../Layout";
import Presentation from "../Components/Presentation/Presentation";
import Separator from "../Components/Shared/Separator/Separator";
import About from "../Components/Home/About/About";
import Skills from "../Components/Home/Skills/Skills";
import ContactMe from "../Components/Home/ContactMe/ContactMe";
import Faq from "../Components/Home/Faq/Faq";

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
            <ContactMe espaco />
            <Separator titulo="Perguntas Frequentes" />
            <Faq />
        </Layout>
    );
}
