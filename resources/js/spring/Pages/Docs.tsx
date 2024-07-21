import Main from "../Components/main";
import { OrdemContextProvider } from "../contexts/OrdemContext";
import { TitulosContextProvider } from "../contexts/TitulosContext";
import {
    Ordem,
    Ordenavel,
    TextoOrdenacao,
    Titulo,
} from "../interfaces/OrdenacaoGeral";
import Layout from "../Layout/Layout";

interface ReactProps {
    ordens: Ordem[];
    objetoAtual: Ordenavel;
    textos: TextoOrdenacao[];
    titulos: Titulo[];
}

export default function Docs({
    ordens,
    objetoAtual,
    textos,
    titulos,
}: Readonly<ReactProps>) {
    return (
        <TitulosContextProvider>
            <OrdemContextProvider>
                <Layout
                    title="Spring Framework Documentation :: Spring Framework"
                    ordens={ordens}
                    titulos={titulos}
                    pagina={objetoAtual.titulo}
                >
                    <Main objetoAtual={objetoAtual} textos={textos} />
                </Layout>
            </OrdemContextProvider>
        </TitulosContextProvider>
    );
}
