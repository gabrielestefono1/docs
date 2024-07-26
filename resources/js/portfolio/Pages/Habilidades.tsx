import SkillsInnerContent from "../Components/Habilidades/SkillsInner/SkillsInnerContent";
import SkillTitle from "../Components/Habilidades/SkillsInner/SkillsTitle";
import HeroSection from "../Components/Home/HeroSection/HeroSection";
import Separator from "../Components/Shared/Separator/Separator";
import Layout from "../Layout";

export default function contato() {
    return (
        <Layout title="Portfolio">
            <HeroSection />
            <Separator titulo="Minhas Habilidades" />
            <SkillTitle/>
            <SkillsInnerContent/>
        </Layout>
    );
}
