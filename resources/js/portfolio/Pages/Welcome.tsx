import Layout from "../Layout";
import Presentation from "../Components/Presentation/Presentation";
import Separator from "../Components/Shared/Separator/Separator";

export default function Welcome() {
    return (
        <Layout title="Portfólio">
            <Presentation />
            <Separator titulo="Sobre" />
            {/* <About /> */}
            <Separator titulo="Projetos" />
            {/* <Project/> */}
            <Separator titulo="Habilidades" />
            {/* <Skills /> */}
            <Separator titulo="Contato" />
            {/* <ContactMe /> */}
            <Separator titulo="Perguntas Frequentes" />
            {/* <Faq /> */}
        </Layout>
    );
}
