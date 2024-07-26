import HeroSection from "../Components/Home/HeroSection/HeroSection";
import ProjectsContent from "../Components/Projetos/ProjectsInner/ProjectsContent";
import ProjectsTitle from "../Components/Projetos/ProjectsInner/ProjectsTitle";
import Separator from "../Components/Shared/Separator/Separator";
import Layout from "../Layout";

export default function Projetos() {
    const text =
        "Lorem ipsum dolor sit amet consectetur adipiscing elit semper dalar elementum tempus hac tellus libero accumsan.";
    return (
        <Layout title="Portfólio">
            <HeroSection />
            <Separator titulo="Projetos" />
            <ProjectsTitle text={text} />
            <ProjectsContent />
        </Layout>
    );
}
