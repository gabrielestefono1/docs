import { Link, usePage } from "@inertiajs/react";
import styles from "./multipleMenu.module.scss";
import chevron from "./chevron.svg";
import { Post } from "@/react/Pages/Welcome";

export default function MultipleMenu({
    texto,
    slug,
    posts,
}: {
    texto: string;
    slug: string;
    posts: Post[];
}) {
    const router = usePage();
    const slugRota = router.url.replace("/referencia/", "");
    const activeChild = posts.find((post) => post.slug === slugRota);
    const active = slugRota == slug || activeChild != undefined;
    return (
        <div>
            <Link
                href={`/referencia/${slug}`}
                className={`${styles.multiple} ${active ? styles.active : ""}`}
            >
                <div>
                    {texto} <img src={chevron} alt="Leia!" />
                </div>
            </Link>
            {active &&
                posts.map((post) => (
                    <Link
                        key={post.id}
                        href={`/referencia/${post.slug}`}
                        className={`${styles.singleChild} ${
                            activeChild?.id === post.id ? styles.active : ""
                        }`}
                    >
                        <div>{post.title_aside}</div>
                    </Link>
                ))}
        </div>
    );
}
