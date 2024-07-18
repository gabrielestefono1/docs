import Main from "../Components/main";
import { OrdemContextProvider } from "../contexts/OrdemContext";
import { Ordem, Ordenavel, TextoOrdenacao } from "../interfaces/OrdenacaoGeral";
import Layout from "../Layout/Layout";

interface ReactProps {
    ordens: Ordem[];
    objetoAtual: Ordenavel;
    textos: TextoOrdenacao[];
}

export default function Docs({
    ordens,
    objetoAtual,
    textos,
}: Readonly<ReactProps>) {
    return (
        <OrdemContextProvider>
            <Layout
                title="Spring Framework Documentation :: Spring Framework"
                ordens={ordens}
            >
                <Main objetoAtual={objetoAtual} textos={textos} />
            </Layout>
        </OrdemContextProvider>
    );
}
