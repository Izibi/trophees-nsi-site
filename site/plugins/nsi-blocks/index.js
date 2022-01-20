panel.plugin("nsi/blocks", {
  blocks: {
    features: `
        <div @dblclick="open">
            <div v-if="content.text && content.features">
              <h2 v-html="content.headline" class="-margin"></h2>
              <p v-html="content.text" class="-margin"></p>
              <ul class="features">
                <li v-for="(item, index) in content.features" :key="'feature_'+index">
                  {{ index + " " + item.feature }}
                </li>
              </ul>
            </div>
            <div v-else>Veuillez entrer un contenu...</div>
        </div>
      `,
    paragraph: `
        <div @dblclick="open">
          <div v-if="content.text && content.headline">
            <h2 v-html="content.headline" class="-margin"></h2>
            <p class="-margin"><strong>{{ content.header }}</strong></p>
            <p v-html="content.text" class="-margin"></p>
          </div>
          <div v-else>Veuillez entrer un contenu...</div>
        </div>
      `,
    mosaic: `
        <div @dblclick="open">
          <div v-if="content.headline && content.thumbnails">
            <h2 v-html="content.headline" class="-margin"></h2>
            <ul class="features mosaic">
              <li class="mosaic__thumbnail" v-for="(item, index) in content.thumbnails" :key="'thumb_'+index">
                <figure><img :src="item.image[0].url" alt="" /></figure>
                <div>{{ item.text }}</div>
              </li>
            </ul>
          </div>
          <div v-else>Veuillez entrer un contenu...</div>
        </div>
      `,
    calendar: `
        <div @dblclick="open">
          <div v-if="content.headline && content.dates">
            <h2 class="-margin" v-html="content.headline"></h2>
            <ul class="features dates">
              <li class="date" v-for="(item, index) in content.dates" :key="'date_'+index">
                <figure ><img v-if="item.icon[0]" :src="item.icon[0].url" alt="" /></figure>
                <h3>{{ item.date_headline }}</h3>
                <div>{{ item.day }}</div>
                <div>{{ item.hour }}</div>
                <div>{{ item.comment }}</div>
              </li>
            </ul>
          </div>
          <div v-else>Veuillez entrer un contenu...</div>
        </div>
      `,
    partners: `
        <div @dblclick="open">
          <div v-if="content.headline && content.partners">
            <h2 class="-margin" v-html="content.headline"></h2>
            <div class="-margin" v-html="content.text"></div>
            <ul class="partners -margin">
              <li class="partner"v-for="(item, index) in content.partners" :key="'partners_'+index">
                <img v-if="item.logo.length > 0" :src="item.logo[0].image.url" :srcset="item.logo[0].image.srcset" :alt="'logo ' + item.name" />
                <p class="partner__name">{{ item.name }}</p>
              </li>
            </ul>
            <h3>Avec le soutien de...</h3>
            <ul class="partners -margin">
              <li class="partner"v-for="(item, index) in content.supports" :key="'partners_'+index">
                <img v-if="item.logo.length > 0" :src="item.logo[0].image.url" :srcset="item.logo[0].image.srcset" :alt="'logo ' + item.name" />
                <p class="partner__name">{{ item.name }}</p>
              </li>
            </ul>
            <div v-html="content.conclusion"></div>
          </div>
          <div v-else>Veuillez entrer un contenu...</div>
        </div>
      `,
    step: `
        <div @dblclick="open">
          <div v-if="content.text && content.headline">
            <h2 v-html="content.headline"></h2>
            <div v-html="content.text"></div>
            <figure><img :src="content.image[0].image.src" alt="content.image[0].image.text"/></figure>
          </div>
          <div v-else>Veuillez entrer un contenu...</div>
        </div>
      `,
    // more blocks
  }
});
