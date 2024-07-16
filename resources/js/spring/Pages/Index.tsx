import Main from "../Components/main";
import { OrdemContextProvider } from "../contexts/OrdemContext";
import { Ordem, Ordenavel } from "../interfaces/OrdenacaoGeral";
import Layout from "../Layout/Layout";

interface ReactProps {
    ordens: Ordem[];
    objetoAtual: Ordenavel;
}

export default function Home({ ordens, objetoAtual }: Readonly<ReactProps>) {
    return (
        <OrdemContextProvider>
            <Layout
                title="Spring Framework Documentation :: Spring Framework"
                ordens={ordens}
            >
                <Main objetoAtual={objetoAtual}/>
            </Layout>
        </OrdemContextProvider>
    );
}
