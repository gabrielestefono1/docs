import ContactMe from "../Components/Home/ContactMe/ContactMe";
import HeroSection from "../Components/Home/HeroSection/HeroSection";
import Separator from "../Components/Shared/Separator/Separator";
import Layout from "../Layout";

export default function Contato(){
    return(
        <Layout title="Portfólio">
            <HeroSection/>   
            <Separator titulo="Contate-me"/>
            <ContactMe espaco={true}/>
        </Layout>
    )
}