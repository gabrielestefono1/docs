import Main from "../Components/main";
import { OrdemContextProvider } from "../contexts/OrdemContext";
import { Ordem } from "../interfaces/OrdenacaoGeral";
import Layout from "../Layout/Layout";

interface ReactProps {
    ordens: Ordem[];
}

export default function Home({ ordens }: Readonly<ReactProps>) {
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
