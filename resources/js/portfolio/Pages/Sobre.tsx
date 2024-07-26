import HeroSection from "../Components/HeroSection/HeroSection";
import AboutInner from "../Components/sobre/AboutInner/AboutInner";
import Layout from "../Layout";

export default function sobre() {
    return (
        <Layout title="Portfólio">
            <HeroSection />
            <AboutInner />
        </Layout>
    );
}
