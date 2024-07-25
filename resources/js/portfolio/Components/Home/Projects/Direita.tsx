import { Swiper, SwiperSlide } from "swiper/react";
import SwiperCore from "swiper";
import styles from "./ProjectDireita.module.scss";
import { Navigation, Pagination } from "swiper/modules";
import "swiper/swiper-bundle.css";

SwiperCore.use([Pagination, Navigation]);

export default function Direita() {
    return (
        <Swiper
            className={styles.swiperDireita}
            centerInsufficientSlides
            slidesPerView={3}
            loop={true}
            breakpoints={{
                500: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                800: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            }}
            pagination={true}
            navigation={true}
        >
            <SwiperSlide className={styles.slides}> Slide 1</SwiperSlide>
            <SwiperSlide className={styles.slides}> Slide 2</SwiperSlide>
            <SwiperSlide className={styles.slides}> Slide 3</SwiperSlide>
            <SwiperSlide className={styles.slides}> Slide 4</SwiperSlide>
            <SwiperSlide className={styles.slides}> Slide 5</SwiperSlide>
            <SwiperSlide className={styles.slides}> Slide 6</SwiperSlide>
        </Swiper>
    );
}
