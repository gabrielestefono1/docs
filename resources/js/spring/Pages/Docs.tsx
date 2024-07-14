import Layout from "../Layout/Layout";
import Main from "../Components/main";
import { OrdemContextProvider } from "../contexts/OrdemContext";
import { Ordem } from "../interfaces/OrdenacaoGeral";

interface ReactProps {
    ordens: Ordem[];
}

export default function Docs({ ordens }: Readonly<ReactProps>) {
    return (
        <OrdemContextProvider>
            <Layout
                title="Spring Framework Documentation :: Spring Framework"
                ordens={ordens}
            >
                <Main />
            </Layout>
        </OrdemContextProvider>
    );
}
